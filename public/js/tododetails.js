class ShowTodo {
    constructor() {
        let todo = JSON.parse(document.getElementById('showContent').getAttribute('todo'));
        this.title = todo.title;
        this.description = todo.description;
        this.completed = todo.completed;
    }

    show_details() {

        this.detailhtml = '<div class="row">\
                                <label for="title" class="col-md-12 col-form-label">Title</label>\
                                <div class="col-md-12">\
                                    <input id="title" type="text" class="form-control" value="' + this.title + '" autocomplete="title" readonly>\
                                </div>\
                            </div>\
                            <div class="row">\
                                <label for="description" class="col-md-12 col-form-label">Description</label>\
                                <div class="col-md-12">\
                                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>' + this.description + '</textarea>\
                                </div>\
                            </div>\
                            <div class="form-check mt-2 mb-2">\
                                <input type="checkbox" class="form-check-input"' + (this.completed ? "checked" : "") + ' disabled>\
                                <label class="form-check-label" for="completed">Completed</label>\
                            </div>\
                            <a href="/" class="btn btn-primary">ok</a>';

        document.getElementById('showContent').innerHTML = this.detailhtml;
    }
}

let obj = new ShowTodo();
obj.show_details();