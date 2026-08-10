@extends('layouts.default', ['title' => 'Artist Statement'])
@section('content')
    @include('inc.navbar', ['index' => false])
    <section>
        <div class="container">
            <div class="heading d-flex align-items-center justify-content-between">
                <div class="underline"></div>
                <h1 class="text-uppercase text-center main-header">The Artist Statement</h1>
                <div class="underline"></div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="lead main-text">My interest in fine art photography grew through travel, with a simple desire
                        to take a moment with me — its light, color, and, most importantly, the feeling of being there.
                        Photography became a way of holding both the visible world and my experience of it. It is also a
                        space in which I slow down, gather my thoughts, and let what is happening around me take shape
                        through my visual and emotional response. Past experience is inseparable from how I perceive the
                        present. Rather than reconstructing memory, I am interested in how what has been lived continues to
                        shape what I see and feel now.
                    </p>
                    <p class="lead main-text">Nature is a recurring presence in my work because it holds contradictions that
                        I recognize in human experience: fragility and resilience, decay and renewal, darkness and light. I
                        am drawn to the way these opposing states coexist within the same landscape, creating a tension in
                        which I search for balance and harmony — not as a resolution, but as an ongoing possibility.
                    </p>
                    <p class="lead main-text">Through camera movement, multiple exposure, and layering, I fragment and extend
                        the photographic moment, allowing different sensations and emotional responses to coexist within a
                        single image.
                    </p>
                    <p class="lead main-text">I do not seek to offer fixed interpretations. I want the photograph to create
                        a space in which the viewer can pause, enter through their own memories and associations, and
                        experience something that may remain unresolved. For me, photography is less a description of the
                        world than a way of translating what it feels like to move through it.
                    </p>
                </div>
            </div>
        </div>
    </section>
@stop
