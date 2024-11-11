@extends('layouts.app')

@section('content')
    <h1>Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="task_name" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="task_name" name="task_name" required>
        </div>

        <div class="mb-3">
            <label for="task_description" class="form-label">Description</label>
            <textarea class="form-control" id="task_description" name="task_description"></textarea>
        </div>

        <div class="mb-3">
            <label for="task_priority" class="form-label">Priority</label>
            <select class="form-select" id="task_priority" name="task_priority" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="task_image" class="form-label">Task Image</label>
            <div class="dropzone" id="taskImageDropzone">
                <div class="dz-message" style="text-align:left;">
                    <h3>Drag & Drop an Image or Click to Select</h3>
                </div>
            </div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="completed" name="completed">
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Task</button>
</form>
    <script type="text/javascript">
        // Initialize Dropzone
        Dropzone.options.taskImageDropzone = {
            url: "{{ route('tasks.store') }}", // Form submission URL
            maxFiles: 1,  // Only allow 1 file
            acceptedFiles: 'image/*', // Only image files
            addRemoveLinks: true, // Allow users to remove the image
            paramName: 'task_image', // Name of the input field that will handle the file upload
            maxFilesize: 2, // Max file size in MB
            dictDefaultMessage: "Drag & Drop an image or click to select", // Default message
            dictInvalidFileType: "Invalid file type. Only images are allowed.",
            dictFileTooBig: "File is too big. Maximum size: 2MB.",
            success: function(file, response) {
                // Append the task image to the hidden form input when file upload is successful
                let taskImageInput = document.createElement('input');
                taskImageInput.type = 'hidden';
                taskImageInput.name = 'task_image';
                taskImageInput.value = response.imagePath; // Assuming `response.imagePath` contains the path of the uploaded image
                document.getElementById('taskForm').appendChild(taskImageInput);
            }
        };
    </script>
@endsection
