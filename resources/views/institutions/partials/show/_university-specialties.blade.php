<div id="vuzik_2">
    <div class="ui pointing secondary menu">
        <a class="item active" data-tab="first">Специальности</a>
        <a class="item" data-tab="third">Приемная комиссия</a>
    </div>
    <div class="ui tab segment t active" data-tab="first">
        <table class="ui celled padded table">
            <thead>
                <tr>
                    <th class="single line">Специальности Бакалавриата</th>
                    <th>Код</th>
                    <th>Коммерческое отделение</th>
                    <th>Срок обучения</th>
                    <th>Форма обучения</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($institution->specialties as $specialty)
                <tr>
                    <td>
                        <a href="{{ route('specialties.show', $specialty) }}">
                            {{ $specialty->title }}
                        </a>
                    </td>
                    <td class="single line">
                        {{ $specialty->code }}
                    </td>
                    <td>
                        @isset($specialty->pivot->study_price)
                            {{ $specialty->pivot->study_price }} тг
                        @endisset
                    </td>
                    <td>
                        @isset($specialty->pivot->study_period)
                            {{ $specialty->pivot->study_period }} года
                        @endisset
                    </td>
                    <td>
                        @isset($specialty->pivot->form)
                            {{ translate($specialty->pivot->form, 'i', 's', true) }}
                        @endisset
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
