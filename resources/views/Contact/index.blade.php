@extends('layouts.app')

@section('titulo', 'Contactos')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Contactos</h2>
        <a href="{{ route('contact.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Novo Contacto
        </a>
    </div>

    <div class="row g-4">
        @forelse ($contacts as $index => $contact)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-contact shadow-sm h-100" style="animation-delay: {{ $index * 0.07 }}s">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="contact-avatar">
                                {{ strtoupper(substr($contact->name, 0, 1)) }}
                            </div>
                            <div>
                                <h5 class="card-title mb-0">{{ $contact->name }}</h5>
                                <small class="text-muted">#{{ $contact->id }}</small>
                            </div>
                        </div>

                        <p class="mb-1">
                            <i class="bi bi-envelope-fill text-primary me-1"></i> {{ $contact->email }}
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-telephone-fill text-primary me-1"></i> {{ $contact->phone ?? 'Sem telefone' }}
                        </p>

                        <p class="text-muted small mb-3">
                            {{ $contact->message ? Str::limit($contact->message, 80) : 'Sem mensagem.' }}
                        </p>

                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-outline-secondary flex-fill">Ver</a>
                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-outline-primary flex-fill">Editar</a>

                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Tem a certeza?')">Apagar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center text-muted py-5">
                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                    <p class="mb-0">Não há contactos ainda.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
