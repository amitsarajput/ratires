<div class="table-responsive-sm">
    <table class="table tyre-sizes">
    <thead>
        <tr>
            <th>SIZE</th>
            <th>L.I./S.r.</th>
            <th>L.R.</th>
            @if (!empty($extraCols))
                @foreach ($extraCols as $key=>$val)
                <th>{{ $val }}</th>
                @endforeach
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($sizes as $key=>$size)
            @php
                $grouped=$sizes->get($key);
            @endphp
            <tr>
                <td  colspan="3" class="key">{{ $key }}"</td>
            </tr>
            @foreach($grouped as $row)
                <tr>
                    <td>{{ $row['rim'] }}</td>
                    <td>{{ $row['li_sr'] }}</td>
                    <td>{{ $row['lr'] }}</td>
                    @if (!empty($extraCols))
                        <x-size-table-extra-cols :excols="$extraCols" :row="$row" />
                    @endif
                </tr>
            @endforeach
        
        @endforeach
        
    </tbody>
    </table>
</div>