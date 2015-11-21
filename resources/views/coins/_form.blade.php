<div class="form-group">
    {!! Form::label('currency_id', 'Divisa', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('currency_id', [1 => 'Euro'], 1, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('country_id', 'País', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('country_id', $countries, null, ['class' => 'form-control',]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('value', 'Valor', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::input("number", 'value', null, ['step' => 'any']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('img_back', 'Imagem', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('img_back') !!}
        <p class="help-block">(Opcional) Imagem do verso da moeda.</p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('commemorative', 'Tipo', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {{-- This will force the browser to send the commemorative value as zero if the box is unchecked. --}}
        {!! Form::input('hidden', 'commemorative', 0)  !!}
        <input id='commemorative' type='hidden' value="0" name='commemorative'>
        {!! Form::checkbox('commemorative') !!} Comemorativa
        <p class="help-block">Indicar se for uma versão comemorativa.</p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Descrição', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
        <p class="help-block">(Opcional) Alguma informação extra sobre a moeda, como por exemplo o significado dos símbolos presentes.</p>
    </div>
</div>

<div class="box-footer col-sm-10 col-sm-offset-2">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>