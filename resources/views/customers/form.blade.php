<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', old('name') ?? $customer->name, ['class'=>'form-control', 'placeholder'=>'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', old('email') ?? $customer->email, ['class'=>'form-control', 'placeholder'=>'Email']) }}
</div>
<div class="form-group">
    {{ Form::label('active', 'Active') }}
    {{ Form::select(
        'active',
        $customer->options['active'], old('active') ?? $customer->getOriginal('active') ,
        ['class'=>'form-control', 'placeholder'=>'please Choose']
        ) }}
</div>
<div class="form-group">
    {{ Form::label('sample', 'Sample') }}
    {{ Form::text('sample',  old('sample') , ['class'=>'form-control', 'placeholder'=>'Sample']) }}
</div>

<div class="form-group">
    {{ Form::label('company_id', 'Company') }}
    {{ Form::select('company_id',
        (
            $companies->mapWithKeys(function ($company) {
                return [$company->id => $company->name];
            })->toArray()
        ),
        old('company_id') ?? $customer->company_id,
        ['class'=>'form-control', 'placeholder'=>'Please Select'])
        }}
</div>
{{-- {{ Form::hidden('author', $post->author ) }} --}}
{{ Form::submit('Submit', ['class' => 'btn btn-primary' ]) }}
