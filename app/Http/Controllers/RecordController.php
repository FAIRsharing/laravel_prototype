<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class RecordController extends Controller
{

	public function index()
    {
        return Record::all();
    }

    public function show(Record $record)
    {
        return $record;
    }

    public function store(Request $request)
    {
        $record = Record::create($request->all());

        return response()->json($record, 201);
    }

    public function update(Request $request, Record $record)
    {
        $record->update($request->all());

        return response()->json($record, 200);
    }

    public function delete(Record $record)
    {
        $redord->delete();

        return response()->json(null, 204);
    }
}
