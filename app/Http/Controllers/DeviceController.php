<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        // Default values
        $pagination = 8;
        $user = null;

        // Check if the page has a user id if it has find it in the database
        if ($request->has('userId')) {
            if ($request->query('userId') != null) {
                $user = User::find($request->query('userId'));
            }
        }

        // Paginate default or with the group id
        $devices = ($user == null) ? Device::paginate($pagination) : Device::where('group_id', $user->group_id)->paginate($pagination);

        return view('device.index', ['devices' => $devices, 'user' => $user]);
    }

    public function create()
    {
        // Get the dropdown from the database
        $dropdown = Group::pluck('name', 'id');

        return view('device.create', ['dropdown' => $dropdown]);
    }

    public function store(Request $request)
    {
        // Validate the form
        $request->validate([
            'group' => 'required',
            'serial_number' => 'required|digits:12|numeric|unique:devices,serial_number'
        ]);

        // Store the items from the form
        $device = new Device;
        $device->group_id = $request->group;
        $device->serial_number = $request->serial_number;
        $device->save();

        // Redirect back to the index page
        return redirect()->route('devices.index')->with('message', 'New device added!');
    }
}
