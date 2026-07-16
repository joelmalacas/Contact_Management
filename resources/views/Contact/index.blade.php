@extends('layouts.app')

@section('titulo', 'Contact')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Contact</h2>
        <a href="{{ route('contact.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> New Contact
        </a>
    </div>

    <div class="row g-4">
        @forelse ($contacts as $index => $contact)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-contact shadow-sm h-100" style="animation-delay: {{ $index * 0.07 }}s">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="contact-avatar">
                                {{ strtoupper(substr($contact->name, 0, 1)) }} {{-- OBTER A PRIMEIRA LETRA --}}
                            </div>
                            <div>
                                <h5 class="card-title mb-0">{{ $contact->name }}</h5>
                            </div>
                        </div>

                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-outline-secondary flex-fill">See</a>
                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-outline-primary flex-fill">Edit</a>

                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center text-muted py-5">
                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                    <p class="mb-0">No contacts yet.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
