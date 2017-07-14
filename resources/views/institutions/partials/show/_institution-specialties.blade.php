<div id="vuzik_2">
    <table class="ui celled padded table">
        <thead>
            <tr>
                <th class="single line">Специальность</th>
                <th>Код</th>
                <th>Стоимость за 1 год</th>
                <th>Срок обучения</th>
                <th>Форма обучения</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institution->specialties as $specialty)
                <tr>
                    <td bgcolor="#fffbd1">
                        <a href="{{ route('specialties.show', [$specialty->institution_type, $specialty]) }}">
                            {{ $specialty->title }}
                        </a>
                    </td>
                    <td class="single line" bgcolor="#fffbd1">
                        {{ $specialty->code }}
                    </td>
                    <td bgcolor="#fffbd1">
                        @isset($specialty->pivot->study_price)
                            {{ $specialty->pivot->study_price }}
                        @endisset
                    </td>
                    <td bgcolor="#fffbd1">
                        @isset($specialty->pivot->study_period)
                            {{ $specialty->pivot->study_period }}
                        @endisset
                    </td>
                    <td bgcolor="#fffbd1">
                        @isset($specialty->pivot->form)
                            {{ translate($specialty->pivot->form, 'i', 's') }}
                        @endisset
                    </td>
                </tr>

                @foreach ($specialty->qualifications as $qualification)
                    <tr>
                        <td>
                            <a href="{{ route('specialties.show', [$specialty->institution_type, $specialty]) }}">
                                {{ $qualification->title }}
                            </a>
                        </td>
                        <td class="single line">{{ $qualification->code }}</td>
                        <td>
                            @isset($qualification->pivot->study_price)
                                @if($qualification->pivot->study_price == 0)
                                    <b style="color:#ff831f">Бюджет</b>
                                @else
                                    {{ $qualification->pivot->study_price }}
                                @endif
                            @endisset
                        </td>
                        <td>
                            @isset($qualification->pivot->study_period)
                                {{ $qualification->pivot->study_period }}
                            @endisset
                        </td>
                        <td>
                            @isset($qualification->pivot->form)
                                {{ translate($qualification->pivot->form, 'i', 's') }}
                            @endisset
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
