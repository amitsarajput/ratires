<div class="table-responsive-sm">
    <table class="table tyre-sizes">
    <thead>
        <tr>
            <th>SIZE</th>
            <th>L.I./S.r.</th>
            <th >L.R.</th>
            @if (!empty($extraCols))
                @foreach ($extraCols as $key=>$val)
                <th>{{ $val }}</th>
                @endforeach
            @endif
        </tr>
    </thead>
    <tbody>
        <tr>
            <td  colspan="3" class="key" >{{ $nav }}"</td>
        </tr>
        @foreach($sizeTable as $row)
            <tr>
                <td>{{ $row['rim'] }}</td>
                <td>{{ $row['li_sr'] }}</td>
                <td>{{ $row['lr'] }}</td>

                @if (!empty($extraCols))
                    <x-size-table-extra-cols :excols="$extraCols" :row="$row" />
                @endif

            </tr>
        @endforeach
        
        
    </tbody>
    </table>
</div>