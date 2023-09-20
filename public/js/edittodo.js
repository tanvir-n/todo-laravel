class EditTodo {
    constructor() {
        let todo = JSON.parse(document.getElementById("edittodo").getAttribute('todo'));
        this.id = todo.id
        this.title = todo.title;
        this.description = todo.description;
        this.completed = todo.completed;

        this.csrf = document.querySelector('meta[name="csrf-token"]').content;
    }

    load_info() {
        this.formHtml = '<form method="POST" action="/todos/' + this.id + '" novalidate>\
                            <div class="form-group row">\
                                <label for="title" class="col-md-12 col-form-label">Title</label>\
                                <div class="col-md-12">\
                                    <input id="title" type="text" class="form-control" name="title" value="' + this.title + '" autocomplete="title">\
                                </div>\
                            </div>\
                            <div class="form-group row">\
                                <label for="description" class="col-md-12 col-form-label">Description</label>\
                                <div class="col-md-12">\
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">' + this.description + '</textarea>\
                                </div>\
                            </div>\
                            <div class="form-group form-check">\
                                <input type="checkbox" class="form-check-input" id="completed" ' + (this.completed ? "checked" : "") + ' name="completed">\
                                <label class="form-check-label" for="completed">Completed</label>\
                            </div>\
                            <input type="hidden" name="_method" value="PATCH">\
                            <input type="hidden" name="_token" value="' + this.csrf + '">\
                            <button type="submit" class="btn btn-success">Submit</button>\
                        </form>'

        document.getElementById("edittodo").innerHTML = this.formHtml;
    }
}

let obj = new EditTodo();
obj.load_info();


// ' + (this.completed) ? 'checked' : 'unchecked' + '