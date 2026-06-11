@extends('admin.layouts.master')

@section('title', 'SMTP Settings')

@section('content')
<div class="section-header">
    <h1>SMTP Settings</h1>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Mail Server</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.email-configuration.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="host">SMTP Host <span class="text-danger">*</span></label>
                        <input type="text" name="host" id="host" class="form-control" value="{{ old('host', $emailConfiguration->host) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="port">SMTP Port <span class="text-danger">*</span></label>
                                <input type="number" name="port" id="port" class="form-control" value="{{ old('port', $emailConfiguration->port) }}" min="1" max="65535" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="encryption">Encryption</label>
                                @php($encryption = old('encryption', $emailConfiguration->encryption ?: 'none'))
                                <select name="encryption" id="encryption" class="form-control">
                                    <option value="none" {{ $encryption === 'none' ? 'selected' : '' }}>None</option>
                                    <option value="tls" {{ $encryption === 'tls' ? 'selected' : '' }}>TLS</option>
                                    <option value="ssl" {{ $encryption === 'ssl' ? 'selected' : '' }}>SSL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">SMTP Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $emailConfiguration->username) }}">
                    </div>

                    <div class="form-group">
                        <label for="password">SMTP Password</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" placeholder="Leave blank to keep current password">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_address">From Email <span class="text-danger">*</span></label>
                                <input type="email" name="from_address" id="from_address" class="form-control" value="{{ old('from_address', $emailConfiguration->from_address) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_name">From Name <span class="text-danger">*</span></label>
                                <input type="text" name="from_name" id="from_name" class="form-control" value="{{ old('from_name', $emailConfiguration->from_name) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" name="is_active" value="1" class="custom-control-input" id="is_active" {{ old('is_active', $emailConfiguration->is_active) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="is_active">Use these database SMTP settings</label>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save SMTP Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>How It Works</h4>
            </div>
            <div class="card-body">
                <p class="mb-2">When this setting is active, mail uses the database SMTP values first.</p>
                <p class="mb-0 text-muted">The <code>.env</code> values are only the fallback and are copied into this table by the migration for the first setup.</p>
            </div>
        </div>
    </div>
</div>
@endsection
