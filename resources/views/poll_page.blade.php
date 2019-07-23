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
                                   <div class="poll-title_single">
                                       <h3>Who is the better footballer?</h3>
                                   </div>
                                   <div class="poll-instruction_single">
                                       <p>
                                           Select an option from the available options.
                                       </p>
                                   </div>
                                   <div class="poll-form_single">
                                       <form action="" class="poll-form">
                                           <div class="control-form">
                                                <input type="radio" class="poll-form-radio" name="poll-choice" value="Christiano Ronaldo"><span class="poll-form-option">Christiano Ronaldo</span>
                                           </div>
                                           <div class="control-form">
                                                <input type="radio" class="poll-form-radio" name="poll-choice" value="Lionel Messi"><span class="poll-form-option">Lionel Messi</span>
                                           </div>
                                           <div class="control-form">
                                                <input type="radio" class="poll-form-radio" name="poll-choice" value="Carlos Tevez"><span class="poll-form-option">Carlos Tevez</span>
                                           </div>
                                           <div class="control-form poll-buttons">
                                               <button type="submit" class="btn btn-lg">Vote</button>
                                               <a href="" class="btn btn-lg poll-results">Results</a>
                                               <a href="" class="btn btn-lg poll-share">Share</a>
                                           </div>

                                        </form>
                                   </div>
                                   <div class="poll-result_single hide">
                                       <div class="poll-result-inner">
                                           <div class="poll-result-header">
                                               <h4>Results</h4>
                                           </div>
                                           <div class="poll-result-body">
                                               <div class="poll-result">
                                                   <div class="poll-result-option">
                                                       <h5>Christiano Ronaldo</h5>
                                                   </div>
                                                   <div class="poll-result-value">
                                                       <h5>30%</h5>
                                                   </div>
                                               </div>
                                               <div class="poll-result">
                                                   <div class="poll-result-option">
                                                       <h5>Lionel Messi</h5>
                                                   </div>
                                                   <div class="poll-result-value">
                                                       <h5>32%</h5>
                                                   </div>
                                               </div>
                                               <div class="poll-result">
                                                   <div class="poll-result-option">
                                                       <h5>Carlos Tevez</h5>
                                                   </div>
                                                   <div class="poll-result-value">
                                                       <h5>38%</h5>
                                                   </div>
                                               </div>
                                               <div class="poll-comment">
                                                   <p>According to other users, <span class="poll-winner">Carlos Tevez</span> is leading this poll</span></p>
                                                    <div class="poll-total-votes">
                                                        <h4>Total Votes: 234</h4>
                                                    </div>
                                                </div>
                                               <div class="poll-result-close">
                                                   <button class="btn btn-lg btn-center poll-result-close">Close Result</button>
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