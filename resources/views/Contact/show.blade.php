@extends('layouts.app')

@section('titulo', 'Contact Details')

@section('conteudo')
    <div class="d-flex align-items-center gap-2 mb-4">
        <a href="{{ route('contact.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2 class="mb-0">Contact Details</h2>
    </div>

    <div class="card shadow-sm" style="max-width: 600px">
        <div class="card-body p-4">

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="contact-avatar" style="width: 60px; height: 60px; font-size: 1.4rem;">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div>
                    <h4 class="mb-0">{{ $contact->name }}</h4>
                    <small class="text-muted">Contact #{{ $contact->id }}</small>
                </div>
            </div>

            <table class="table table-borderless mb-4">
                <tr>
                    <th style="width: 140px">
                        <i class="bi bi-envelope-fill text-primary me-1"></i> Email
                    </th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>
                        <i class="bi bi-telephone-fill text-primary me-1"></i> Phone
                    </th>
                    <td>{{ $contact->contact ?? 'Não fornecido' }}</td>
                </tr>
                <tr>
                    <th>
                        <i class="bi bi-calendar-check-fill text-primary me-1"></i> Created in
                    </th>
                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th>
                        <i class="bi bi-clock-history text-primary me-1"></i> Updated in
                    </th>
                    <td>{{ $contact->updated_at->format('d/m/Y H:i') }}</td>
                </tr>
            </table>

            <div class="d-flex gap-2">
                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-fill"></i> Edit
                </a>

                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-trash-fill"></i> Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection
