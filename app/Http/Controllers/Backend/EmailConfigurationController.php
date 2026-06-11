<?php

namespace App\Http\Controllers\Backend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use Illuminate\Http\Request;

class EmailConfigurationController extends Controller
{
    public function edit()
    {
        $emailConfiguration = EmailConfiguration::firstOrCreate(
            [],
            EmailConfiguration::defaultsFromConfig()
        );

        return view('admin.email_configuration.edit', compact('emailConfiguration'));
    }

    public function update(Request $request)
    {
        $emailConfiguration = EmailConfiguration::firstOrCreate(
            [],
            EmailConfiguration::defaultsFromConfig()
        );

        $data = $request->validate([
            'host' => ['required', 'string', 'max:255'],
            'port' => ['required', 'integer', 'min:1', 'max:65535'],
            'encryption' => ['nullable', 'in:tls,ssl,none'],
            'username' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'max:255'],
            'from_address' => ['required', 'email', 'max:255'],
            'from_name' => ['required', 'string', 'max:255'],
        ]);

        $data['mailer'] = 'smtp';
        $data['is_active'] = $request->boolean('is_active');
        $data['encryption'] = $data['encryption'] === 'none' ? null : $data['encryption'];

        if (blank($data['password'])) {
            unset($data['password']);
        }

        $emailConfiguration->update($data);
        MailHelper::setMailConfig();

        return redirect()
            ->route('admin.email-configuration.edit')
            ->with('success', 'SMTP settings updated successfully.');
    }
}
