<div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Mahasiswa</th>
                <th>Equipment</th>
                <th>Loan Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loanlog as $item)
            <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'text-bg-danger' : 'text-bg-success') }}>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->mahasiswa->username }}</td>
                <td>{{ $item->equipment->name }}</td>
                <td>{{ $item->loan_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->actual_return_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
