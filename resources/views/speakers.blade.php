@extends('layout')

@section('content')
    <div class="container" id="app">
        <ais-index app-id="VX7SSUP845" api-key="7b8b78e32d93745b94b610352d037e63" index-name="speakers">
            <ais-input placeholder="Search laracon speakers"></ais-input>
            <div class="flex-container">
                <div class="left">
                    <ais-refinement-list attribute-name="conferences">
                        <template slot="header">
                            <b>Conferences</b>
                        </template>
                    </ais-refinement-list>
                    <ais-refinement-list attribute-name="number_of_conf">
                        <template slot="header">
                            <b>Number of conferences</b>
                        </template>
                    </ais-refinement-list>
                </div>
                <div class="right">
                    <ais-no-results></ais-no-results>
                    <ais-results :result-per-page="6">
                        @verbatim
                            <template scope="{ result }">
                                <div class="speaker">
                                    <div class="speaker-image">
                                        <img v-bind:src="result.image" />
                                    </div>
                                    <div class="speaker-details">
                                        <div v-html="result._highlightResult.name.value" class="speaker-details-name">
                                        </div>
                                        <div v-html="result._highlightResult.title.value" class="speaker-details-title">
                                        </div>
                                        <div class="speaker-details-events">
                                            <div class="speaker-details-events-item" v-for="conf in result.conferences">
                                                {{conf}}
                                            </div>
                                        </div>
                                        <div class="speaker-details-action">
                                            <a v-bind:href="'/speaker/' + result.id + '/edit'">Edit</a>
                                            <a v-bind:href="'/speaker/' + result.id + '/delete'">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </template>
                    </ais-results>
                    @endverbatim
                    <ais-pagination></ais-pagination>
                </div>
            </div>
        </ais-index>
    </div>
@endsection