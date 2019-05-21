<template>
    <div class="card card-statistics mx-auto card-plus" @click="openForm">
        <img :src="'/images/plus.svg'" class="card-img-plus" alt="plus">
        <div class="modal fade" id="createProjectForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ trans.get('project.create-project') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="projectTitle"
                                                     type="text"
                                                     :label="trans.get('project.title')"
                                                     v-model="projectTitle"></v-input>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-markdown-editor id="projectContent"
                                                               :label="trans.get('project.content')"
                                                               v-model="projectContent"></v-markdown-editor>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-lg-6">
                                            <v-datepicker id="startDate"
                                                          :label="trans.get('project.start_at')"></v-datepicker>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <v-datepicker id="endDate"
                                                          :label="trans.get('project.end_at')"></v-datepicker>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="projectType"
                                                     type="text"
                                                     :label="trans.get('project.type')"></v-input>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <label>{{ trans.get('project.add-image') }}</label>
                                            <br>
                                            <croppa v-model="imagePicker"
                                                    :prevent-white-space="true"
                                                    :reverse-scroll-to-zoom="true"
                                                    :placeholder="trans.get('common.choose-file')"></croppa>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="projectType"
                                                     type="password"
                                                     :label="trans.get('project.password')"></v-input>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="projectType"
                                                     type="password"
                                                     :label="trans.get('project.password_confirmation')"></v-input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans.get('project.cancel') }}</button>
                        <button type="button" class="btn btn-primary">{{ trans.get('project.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VInput from "../forms/VInput";
    import VMarkdownEditor from "../forms/VMarkdownEditor";
    import VDatepicker from "../forms/VDatepicker";
    import Croppa from 'vue-croppa'
    export default {
        name: "CreateProjectBlock",
        components: {croppa: Croppa.component, VDatepicker, VMarkdownEditor, VInput},
        data: function () {
            return {
                projectTitle: null,
                projectContent: null,
                imagePicker: {}
            }
        },
        methods: {
            openForm: function () {
                $('#createProjectForm').modal('show')
            }
        }
    }
</script>