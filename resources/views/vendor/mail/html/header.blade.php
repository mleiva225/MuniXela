@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}/login" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{  asset('backend/assets/images/logo-light1.png') }}" class="logo" alt="" >
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
