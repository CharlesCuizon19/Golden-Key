<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        Log::info('Fetching contact messages list');

        $contacts = ContactUs::latest()->paginate(10);

        return view('admin.contact-us.index', compact('contacts'));
    }

    /**
     * Show a single contact message.
     */
    public function show(ContactUs $contact)
    {
        Log::info('Showing contact message', ['id' => $contact->id]);

        return view('admin.contact-us.show', compact('contact'));
    }

    /**
     * Delete a contact message.
     */
    public function destroy(ContactUs $contact)
    {
        Log::info('Attempting to delete contact message', ['id' => $contact->id]);

        try {
            $contact->delete();

            Log::info('Contact message deleted successfully', ['id' => $contact->id]);

            return redirect()
                ->route('admin.contact-us.index')
                ->with('success', 'Contact message deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting contact message', [
                'id' => $contact->id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('admin.contact-us.index')
                ->with('error', 'Something went wrong while deleting the contact message.');
        }
    }

    /**
     * Optional: Export to Excel (requires Maatwebsite Excel package)
     */
    public function export()
    {
        Log::info('Exporting contact messages to Excel');

        try {
            // Example using Laravel Excel
            // return Excel::download(new ContactUsExport, 'contact_messages.xlsx');
        } catch (\Exception $e) {
            Log::error('Failed to export contact messages', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('admin.contact-us.index')
                ->with('error', 'Failed to export contact messages.');
        }
    }
}
