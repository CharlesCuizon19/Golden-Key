<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::latest()->paginate(10);
        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agents.create');
    }

    public function store(Request $request)
    {
        Log::info('Agent store method called', ['request_data' => $request->all()]);

        try {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'image'    => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:5120',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/agents'), $filename);
                $validated['image'] = 'storage/agents/' . $filename;
            }

            Agent::create($validated);

            Log::info('Agent created successfully', ['agent' => $validated]);

            return redirect()->route('admin.agents.index')->with('success', 'Agent created successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing agent', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    public function edit(Agent $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
        Log::info('Agent update method called', [
            'agent_id' => $agent->id,
            'request_data' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'image'    => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:5120',
            ]);

            if ($request->hasFile('image')) {
                // delete old image
                if ($agent->image && file_exists(public_path($agent->image))) {
                    unlink(public_path($agent->image));
                }

                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/agents'), $filename);
                $validated['image'] = 'storage/agents/' . $filename;
            } else {
                $validated['image'] = $agent->image;
            }

            $agent->update($validated);

            Log::info('Agent updated successfully', ['agent_id' => $agent->id]);

            return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating agent', [
                'agent_id' => $agent->id,
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Something went wrong during update.');
        }
    }

    public function destroy(Agent $agent)
    {
        try {
            if ($agent->image && file_exists(public_path($agent->image))) {
                unlink(public_path($agent->image));
            }

            $agent->delete();

            Log::info('Agent deleted', ['agent_id' => $agent->id]);

            return redirect()->route('admin.agents.index')->with('success', 'Agent deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting agent', [
                'agent_id' => $agent->id,
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Failed to delete agent.');
        }
    }
}
