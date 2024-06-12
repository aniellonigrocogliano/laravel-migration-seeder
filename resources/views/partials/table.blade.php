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
        @if (!$Trains->cancellato)
            <td>
                <p class="text-success">In orario</p>
            </td>
        @else
            <td>
                <p class="text-danger">Cancellato</p>
            </td>
        @endif
    @else
        <td>
            <p class="text-danger">In ritardo</p>
        </td>
    @endif
    @if (!$Trains->cancellato)
        <td>
            <p class="text-success">Attivo</p>
        </td>
    @else
        <td>
            <p class="text-danger">Cancellato</p>
        </td>
    @endif
</tr>
