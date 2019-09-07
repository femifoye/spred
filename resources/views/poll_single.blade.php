<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="page-grid">
                        <div class="main-content">
                           <div class="poll-body_single">
                                <div class="poll-inner_single">
                                    <div class="breadcrumb text-secondary bg-light row"><div class="col-11 m-t-5">Polls \ Vote \ {{str_slug(str_limit($poll->question, 20))}}</div>
                                    <a class="btn btn-primary pull-right" href="{{route('slide-polls')}}">All</a>
                                    </div>
                                    <div></div>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <p>{{__("You've already casted your vote for this poll. Please try another poll")}}</p>
                                </div>
                                @elseif(Session::has('success'))
                                <div class="alert alert-success">
                                    <h5>{{Session::get('success')}}</h5>
                                </div>
                                @endif
                                @isset($responded)
                                @else
                                   <div class="poll-title_single">
                                       <h3>{{$poll->question}}</h3>
                                   </div>
                                   <div class="poll-instruction_single">
                                       <p>
                                           Select an option from the available options.
                                       </p>
                                   </div>
                                   <div class="poll-form_single">
                                        <form method="POST" action="{{route('polls.store')}}" class="poll-form">
                                            @csrf
                                            @isset($edit)
                                            {{@method_field('PUT')}}
                                            @endisset
                                            <input type="text" hidden name="poll_id" value="{{$poll->id}}">
                                            @foreach(json_decode($poll->options) as $key => $option)
                                            <div class="control-form">
                                                <input type="radio" class="poll-form-radio" name="response_id" value="{{$key}}"><span class="poll-form-option">{{$option}}</span>
                                            </div>
                                            @endforeach
                                            <button type="submit" class="btn btn-lg btn-secondary">Vote</button>
                                        </form>
                                   </div>

                                @endisset

                                    <div class="control-form poll-buttons btn-group">

                                        <a href="" class="btn btn-lg btn-primary poll-results" style="background-color:#0000FF; color:white">Results</a>
                                        <a href="" class="btn btn-lg poll-share btn-info">Share</a>
                                    </div>

                                    <div class="poll-result_single hide">
                                       <div class="poll-result-inner">
                                           <div class="poll-result-header">
                                               <h4>Results</h4>
                                           </div>
                                           <div class="poll-result-body">
                                               @foreach($computed['result'] as $key => $value)
                                               <div class="poll-result">
                                                   <div class="poll-result-option">
                                                       <h5>{{$key}}</h5>
                                                   </div>
                                                   <div class="poll-result-value">
                                                       <h5>{{$value}}%</h5>
                                                   </div>
                                               </div>
                                               @endforeach
                                               <div class="poll-comment">
                                                    @if($computed['total'])
                                                        <p>According to all users vote, <span class="poll-winner">
                                                        @foreach($computed['lead'] as $lead)
                                                        {{$lead}}@if($loop->remaining > 1){{__(',')}}
                                                        @elseif($loop->remaining > 0)
                                                        {{__('&')}}
                                                        @endif
                                                        @endforeach
                                                        </span> @if(count($computed['lead']) > 1) are @else is @endif leading this poll</span></p>

                                                    @endif
                                                    <div class="poll-total-votes">
                                                        <h4>Total Votes: {{$computed['total']}}</h4>
                                                    </div>
                                                </div>
                                               <div class="poll-result-close">
                                                   <button class="btn btn-lg btn-danger btn-center poll-result-close">Close Result</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="poll-comments">
                                       <!-- <h4>POLL DISQUS COMMENTS GO HERE</h4> -->
                                   </div>
                               </div>
                           </div>
                        </div> <!-- MAIN CONTENT -->
                        @include('includes.sidebar')
                    </div>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
