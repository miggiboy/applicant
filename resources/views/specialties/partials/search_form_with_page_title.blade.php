<h1>Спецальности высшего и средне-специального образования</h1>
<p>В данном разделе Вы найдете список и информацию по специальстям для колледжей и ВУЗов. Так же Вы сможете найти учебные заведения, в которых присутствует выбранная Вами специальность. Если Вы ищете конкретную специальность - введите ее название в поле внизу и нажмите кнопку "найти". Или Вы можете найти интересующую Вас специальность в одной из категорий.</p>
<hr size="1" color="#ff831f">
<hr size="1" color="#ff5500">
<hr size="1" color="#ffb47a">
<form action="{{ route('specialties.search') }}" method="get">
    <p>
    {{-- <div class="ui search"> --}}
      <div class="ui icon input" style="height: 43px;" id="search-input">
        <input type="text"
               name="query"
               value="{{ request('query') }}"
               class="prompt"
               placeholder="Введите название или код специальности ..."
               style="width: 864px;margin-right: 12px;"
               autofocus>
        <i class="search icon"></i>
        <input type="submit" value="Найти">
      </div>
    {{-- </div> --}}
    </p>
</form>
<hr size="1" color="#ff831f">
<hr size="1" color="#ff5500">
<hr size="1" color="#ffb47a">
