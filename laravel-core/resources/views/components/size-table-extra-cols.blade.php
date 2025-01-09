@props(['excols', 'row'])
@foreach ($excols as $key=>$val)
    @if ($key==='eulabel')
        <td>
        <input type="checkbox" 
            id="eulabel-{{ $row['rim'] }}" 
            class="eulabel-checkbox">
        <label 
            for="eulabel-{{ $row['rim'] }}" 
            class="label-as-link eulabeldetails-toggle-button">
            Show EU labels
        </label>
    </td>
    </tr>
    <tr id="eulabel-eulabeldetails-{{ $row['rim'] }}" class="eulabeldetails">
        <td colspan="4">
            <div class="eulabel-image {{ (isset($row['exempted']) && $row['exempted']==true)?'no-border':'' }}">
                <img class="lozad" 
                    src="{{ asset('storage/eu-labels/Label_'.$row[$key].'.webp') }}" 
                    alt="">
            </div>
        </td>
    @elseif ($key==='s_w')
        <td>{{ $row[$key] }}</td>
    @endif
@endforeach