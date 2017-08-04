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
            @foreach ($institution->specialties_distinct as $specialty)

                @php
                    $qualifications = $specialty->qualificationsOf($institution);
                @endphp

                @if (count($qualifications))

                    <tr>
                        <td bgcolor="#fffbd1" colspan="5">
                            <a href="{{ route('specialties.show', $specialty) }}">
                                {{ $specialty->getNameWithCodeOrName() }}
                            </a>
                        </td>
                    </tr>

                    @foreach ($qualifications as $qualification)
                        <tr>
                            <td>
                                <a href="{{ route('specialties.show', $qualification) }}">
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
                @else
                    <tr>
                        <td bgcolor="#fffbd1">
                            <a href="{{ route('specialties.show', $specialty) }}">
                                {{ $specialty->title }}
                            </a>
                        </td bgcolor="#fffbd1">
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
                                {{ translate($specialty->pivot->form) }}
                            @endisset
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
