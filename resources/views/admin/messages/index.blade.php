@extends('admin.layouts.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header">
            <h4>Messages List</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Done</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($messages as $message)
                            <tr class="{{ $message->done ? 'table-success' : '' }}">

                                <td>{{ $message->id }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email ?? '—' }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ Str::limit($message->message, 60) }}</td>
                                <td>{{ $message->created_at->format('d M Y') }}</td>

                                <td>
                                    <form
                                        action="{{ route('admin.messages.toggleDone', $message) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                onchange="this.form.submit()"
                                                {{ $message->done ? 'checked' : '' }}
                                            >
                                        </div>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Messages Found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{ $messages->links() }}

        </div>
    </div>
@endsection