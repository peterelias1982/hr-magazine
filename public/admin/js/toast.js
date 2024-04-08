document.addEventListener("DOMContentLoaded", function () {
    if (Object.keys(messages).length !== 0) {
    // get toats container
        let toastContainer = document.querySelector('.toast-container');
        let toast = '';
    // get success messages
        if(messages.success) {
            messages.success.forEach(msg => {
            //     create toast
            toast += `
                <div class="toast" role="status" aria-live="polite" aria-atomic="true" data-bs-delay="3000">
                    <div class="toast-header">
                        <img src='../images/success-icon.svg' alt="sucess message" width="20px">
                        <strong class="me-auto ps-1">Sucess</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${msg}
                    </div>
                </div>
                `
            })
        }

        if(messages.error) {
            messages.error.forEach(msg => {
                //     create toast
                toast += `
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="toast-header">
                        <img src='../images/warning-icon.svg' alt="error message">
                        <strong class="me-auto ps-1">Error</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${msg}
                    </div>
                </div>
                `
            })
        }

        //     append toast to container
        toastContainer.innerHTML = toast;

        setTimeout(()=> {
            //     get all appended toasts
            let toasts = document.querySelectorAll('.toast');
            toasts.forEach(toast => {
                (new bootstrap.Toast(toast)).show();
            })
        }, 1)
    }
})
