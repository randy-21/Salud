@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('img/imagen.png')}}" class="logo" alt="Indicadores de Salud">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
