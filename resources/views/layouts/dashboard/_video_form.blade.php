
`           <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Video Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                {!! Form::label('url', 'Youtube URL') !!}
                {!! Form::text('url', null, ['class' => 'form-control']) !!}
                @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                {!! Form::label('category_list', 'Video Category') !!}
                {!! Form::select('category_list[]', $categories, null, ['class' => 'form-control', 'multiple', 'id' => 'category_list']) !!}
                @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                {!! Form::label('description', 'Video Description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-youtube-play"></i> {{ $submitButtonText}}
                </button>
            </div>