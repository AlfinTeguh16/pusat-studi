<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $event = Event::where('nidn', Auth::user()->nidn)->paginate(10);

            return view('inputdosen.event', compact('user', 'events'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching events: ' . $e->getMessage());
        }
    }

    public function searchEvent(Request $request)
    {
        $query = $request->input('query');

        $event = Event::where('nidn', Auth::user()->nidn)
            ->when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('inputdosen.event', compact('event'));
    }

    public function detailEvent($id){
        $event = Event::findOrFail($id);
        return view('inputdosen.detailevent', compact('event'));
    }

    public function viewStoreEvent(){
        return view('inputdosen.inputevent');
    }

    public function create(Request $request)
    {
        try {
            $authenticatedUser = Auth::user();
            if (!$authenticatedUser) {
                return redirect()->back()->with('error', 'User not authenticated');
            }

            $authenticatedUserNidn = $authenticatedUser->nidn;
            $authenticatedUserName = $authenticatedUser->nama;

            $validatedData = $request->validate([
                'nidn' => 'required|string|in:' . $authenticatedUserNidn,
                'nama' => 'required|string|in:' . $authenticatedUserName,
                'judul' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sub_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi' => 'required',
                'tempat' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'link' => 'url',
            ]);

            $gambarPath = $request->file('gambar')->store('event_images', 'public');
            $subGambarPath = $request->file('sub_gambar')->store('sub_event_images', 'public');

            $validatedData['nidn'] = $authenticatedUserNidn;
            $validatedData['nama'] = $authenticatedUserName;
            $validatedData['gambar'] = $gambarPath;
            $validatedData['sub_gambar'] = $subGambarPath;

            $event = Event::create($validatedData);

            $event->save();

            // return view('inputdosen.inputevent')->with('success', 'Event created successfully');
            return response()->json(['success' => 'Event created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating event: ' . $e->getMessage());
        }
    }


    public function viewUpdateEvent($id){
        try {
            $event = Event::findOrFail($id);

            return view('inputdosen.editevent', compact('event'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching event for editing: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $authenticatedUser = Auth::user();
            if (!$authenticatedUser) {
                return redirect()->back()->with('error', 'User not authenticated');
            }

            $authenticatedUserNidn = $authenticatedUser->nidn;
            $authenticatedUserName = $authenticatedUser->nama;

            $validatedData = $request->validate([
                'judul' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sub_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi' => 'required',
                'tempat' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'link' => 'url',
            ]);

            $event = Event::findOrFail($id);

            $event->judul = $validatedData['judul'];
            $event->deskripsi = $validatedData['deskripsi'];
            $event->tempat = $validatedData['tempat'];
            $event->tanggal_mulai = $validatedData['tanggal_mulai'];
            $event->tanggal_selesai = $validatedData['tanggal_selesai'];
            $event->link = $validatedData['link'];

            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('event_images', 'public');
                $event->gambar = $gambarPath;
            }

            if ($request->hasFile('sub_gambar')) {
                $subGambarPath = $request->file('sub_gambar')->store('sub_event_images', 'public');
                $event->sub_gambar = $subGambarPath;
            }

            $event->save();

            return redirect()->route('viewUpdateEvent', ['id' => $event->id])->with('success', 'Event updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating event: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);

            $event->delete();

            return redirect()->route('searchEvent')->with('success', 'Event deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Event not found');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting event: ' . $e->getMessage());
        }
    }
}
