<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head');
    <body>
    @include('includes.navigation');   
        <section class="page-section">
            <section class="section-inner">
                <div class="section-container">
                    <div class="page-grid">
                        <div class="main-content">

                        </div> <!-- MAIN CONTENT -->
                        @include('includes.sidebar');
                    </div>
                </div>
            </section>
        </section>
   
    @include('includes.footer')   
    </body>
</html>