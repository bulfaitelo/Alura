@component('mail::message')

 # {{  $nomeSerie }} criada!

 A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas a {{ $episodiosPorTemporada }} bla blabla

Acesse aqui:
 @component('mail::button', ['url' => route('seasons.index', $idSerie)])
      Ver série
 @endcomponent


 - item 3
 - item 3
@endcomponent
