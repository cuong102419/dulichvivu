Dropzone.autoDiscover = false;

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

Dropzone.prototype.defaultOptions.headers = {
    "X-CSRF-TOKEN": csrfToken,
};

const dropzoneForm = document.getElementById("image-create");
const url = dropzoneForm.dataset.url;

const myDropzone = new Dropzone("#image-create", {
    url: url,
    method: "post",
    paramName: "images",
    acceptedFiles: "image/*",
    autoProcessQueue: false,
    uploadMultiple: true,
    addRemoveLinks: true,
    maxFiles: 5,
    parallelUploads: 10,
    init: function () {
        const dz = this;

        let hasShownMaxFileAlert = false;

        dz.on("maxfilesexceeded", function (file) {
            dz.removeFile(file);

            if (!hasShownMaxFileAlert) {
                hasShownMaxFileAlert = true;
                alert("Bạn chỉ được chọn tối đa 5 ảnh.");
                setTimeout(() => {
                    hasShownMaxFileAlert = false;
                }, 2000);
            }
        });

        dz.on("queuecomplete", function () {
            const redirectUrl =
                document.querySelector(".btn-upload").dataset.redirectUrl;
            if (redirectUrl) {
                window.location.href = redirectUrl;
            }
        });

        document
            .querySelector(".btn-upload")
            .addEventListener("click", function (e) {
                e.preventDefault();

                const totalFiles = dz.getAcceptedFiles().length;

                if (totalFiles < 5) {
                    alert("Bạn phải chọn ít nhất 5 ảnh.");
                    return;
                }

                dz.processQueue();
            });
    },
});
