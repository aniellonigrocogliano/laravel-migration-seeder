<tr>

    @if ($Trains->azienda == 'Trenitalia')
        <td><img src="{{ Vite::asset('resources/img/ti.png') }}" class="" alt="{{ $Trains->azienda }}"></td>
    @elseif($Trains->azienda == 'Italo')
        <td><img src="{{ Vite::asset('resources/img/it.png') }}" class="" alt="{{ $Trains->azienda }}"></td>
    @elseif($Trains->azienda == 'Trenord')
        <td><img src="{{ Vite::asset('resources/img/tn.png') }}" class="" alt="{{ $Trains->azienda }}"></td>
    @elseif($Trains->azienda == 'Ferrovie del Sud Est')
        <td><img src="{{ Vite::asset('resources/img/fds.png') }}" class="" alt="{{ $Trains->azienda }}"></td>
    @elseif($Trains->azienda == 'Ferrovie del Gargano')
        <td><img src="{{ Vite::asset('resources/img/fdg.png') }}" class="" alt="{{ $Trains->azienda }}"></td>
    @else
        <td>{{ $Trains->azienda }}</td>
    @endif

    <td>{{ $Trains->stazione_partenza }}</td>
    <td>{{ $Trains->stazione_arrivo }}</td>
    <td>{{ $Trains->codice_treno }}</td>
    @php
        $partenza = new DateTimeImmutable($Trains->orario_partenza);
        $arrivo = new DateTimeImmutable($Trains->orario_arrivo);
        $durata = $partenza->diff($arrivo);
    @endphp
    <td>{{ $arrivo->format('d-m-Y H:i:s') }}</td>
    <td>{{ $partenza->format('d-m-Y H:i:s') }}</td>
    <td>{{ $durata->format('%H:%I:%S') }}</td>
    @if ($Trains->in_orario)
        <td><i class="text-success fa-solid fa-check"></i></td>
    @else
        <td> <i class="text-danger fa-solid fa-xmark"></i></td>
    @endif
    @if (!$Trains->cancellato)
        <td><i class="text-success fa-solid fa-check"></i></td>
    @else
        <td> <i class="text-danger fa-solid fa-xmark"></i></td>
    @endif
</tr>
