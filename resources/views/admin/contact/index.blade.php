@extends('admin.layouts.app')
@section('content')

    <div id="list_contact">
        <table class="tbl" id="tbl_contact">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Time to send</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->fullname }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phoneNumber }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('contact.destroy', $contact) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button title="Delete" type="submit" class="btn btn-danger btn-delete" onclick="return confirmDelete()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contacts->links() }}
        <script>
            function confirmDelete() {
                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    document.getElementById('deleteForm').submit();
                } else {
                    return false;
                }
            }
        </script>
    </div>
@endsection
