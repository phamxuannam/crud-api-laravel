@foreach ($users as $i => $user)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->age }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>
            <a href="#" class="btn btn-sm btn-info showBtn" data-id="{{ $user->id }}"
                data-name={{ $user->name }} data-email={{ $user->email }} data-password={{ $user->password }}
                data-age={{ $user->age }} data-created={{ $user->created_at }} data-admin={{ $user->isAmin }}>
                <i class="las la-info"></i>
            </a>
            <a href="#" class="btn btn-sm btn-success editBtn" data-id={{ $user->id }}
                data-name={{ $user->name }} data-email={{ $user->email }} data-age={{ $user->age }}
                data-admin={{ $user->isAdmin }}>
                <i class="las la-edit"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger deleteBtn" data-id={{ $user->id }}>
                <i class="las la-times"></i>
            </a>
        </td>
    </tr>
@endforeach
