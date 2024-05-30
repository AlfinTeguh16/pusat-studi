<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventItems;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // public function index()
    // {
    //     $event = Event::all();
    //     return view('users.events.event', compact('event'));
    // }

    public function searchEvent(Request $request)
    {
        $query = $request->input('query');

        $events = DB::table('tb_events')
            ->leftJoin('tb_events_items', function ($join) {
                $join->on('tb_events.id', '=', 'tb_events_items.events_id')
                     ->where('tb_events_items.jenis', '=', 'description');
            })
            ->select('tb_events.id', 'tb_events.users_id', 'tb_events.judul', DB::raw('GROUP_CONCAT(tb_events_items.content SEPARATOR ", ") as description'))
            ->where('tb_events.judul', 'LIKE', "%{$query}%")
            ->groupBy('tb_events.id', 'tb_events.users_id', 'tb_events.judul')
            ->paginate(10);

        return view('users.events.event', compact('events', 'query'));
    }

    public function destroy($id)
    {
        DB::table('tb_events_items')->where('events_id', $id)->delete();

        DB::table('tb_events')->where('id', $id)->delete();

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Menghapus Events dengan ID ' . $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('event.list')->with('success', 'Data berhasil dihapus');
    }

    public function viewStoreEvent()
    {
        return view('users.events.inputevent');
    }



    public function showEvent($id)
    {
        $event = DB::table('tb_events')->where('id', $id)->first();
        $eventItems = DB::table('tb_events_items')->where('events_id', $id)->orderBy('order')->get();

        return view('users.events.detailevent', compact('event', 'eventItems'));
    }
    public function listEvent() {
        $events = DB::table('tb_events')
            ->leftJoin('tb_events_items', 'tb_events.id', '=', 'tb_events_items.events_id')
            ->select('tb_events.id', 'tb_events.users_id', 'tb_events.judul',
                DB::raw('(SELECT content FROM tb_events_items WHERE tb_events_items.events_id = tb_events.id AND jenis = "description" LIMIT 1) as description'))
            ->groupBy('tb_events.id', 'tb_events.users_id', 'tb_events.judul')
            ->orderBy('tb_events.created_at', 'desc')
            ->paginate(10);

        return view('users.events.event', compact('events'));
    }


    public function storeEvent(Request $request)
    {
        // dd($request);
        $events_id = DB::table('tb_events')->insertGetId([
            'judul' => $request->judul,
            'users_id' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($request->event as $key => $value) {

            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);

                DB::table('tb_events_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'events_id' => $events_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            else {
                DB::table('tb_events_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'events_id' => $events_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

        }

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Membuat Events : ' . $request->judul,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return response()->json(['message' => 'Data created successfully', 'events_id' => $events_id, 'value' => $value], 201);
        // return view ('users.meta-datas.inputmetadata');
    }


    public function editEvents($id)
    {
        $event = DB::table('tb_events')->where('id', $id)->first();
        $eventItems = DB::table('tb_events_items')->where('events_id', $id)->orderBy('order')->get();

        return view('users.events.editevent', compact('event', 'eventItems'));
    }

    public function updateEvent(Request $request, $id)
    {

        DB::table('tb_events')->where('id', $id)->update([
            'judul' => $request->judul,
            'updated_at' => now()
        ]);

        DB::table('tb_events_items')->where('events_id', $id)->delete();

        foreach ($request->event as $key => $value) {
            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);

                DB::table('tb_events_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'events_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                DB::table('tb_events_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'events_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Update Events : ' . $request->judul,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['message' => 'Data updated successfully'], 200);
    }
}
