<div class="feedback-button-container">
    <button id="feedbackButton" class="feedback-button">PHẢN HỒI</button>
</div>

<!-- Form for feedback -->
<div id="feedbackForm" class="feedback-form">
    <div class="form-header">
        <span class="close-btn">&times;</span>
        <h3>Gửi Lời Nhắn Đến Quản Trị Viên</h3>
    </div>

    <form action="/submitFeedback" method="POST">
        <label for="name">Họ Tên:</label>
        <input type="text" id="name" name="name" class="editable" value="QuangSon" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="editable" value="sonnqph33526@fpt.edu.vn" required>

        <label for="link">Liên Kết:</label>
        <input type="url" id="link" name="link" class="editable" value="https://www.vietnovel.com/" required>

        <label for="message">Lời Nhắn:</label>
        <textarea id="message"  class="editable" placeholder="Vui lòng mô tả chi tiết vấn đề..." required></textarea>

        <label for="fileUpload">Tải Lên Hình Ảnh:</label>
        <input class="editable" type="file" id="fileUpload" name="fileUpload" multiple>


        <button type="submit" class="btn btn-primary mt-4">Gửi Lời Nhắn</button>

    </form>
</div>


<div id="backToTop" class="back-to-top">
    <span>&uarr;</span>
</div>

<style>
.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    background-color: #d3d3d3; /* Màu nền của nút */
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
    font-size: 24px;
    color: white;
    cursor: pointer;
    display: none; /* Ban đầu ẩn đi */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s;
}

.back-to-top:hover {
    background-color: #888; /* Màu khi hover */
}

.back-to-top span {
    display: inline-block;
    transform: rotate(360deg); /* Nếu muốn mũi tên quay ngang */
}



   /* Style for feedback button on the right */
.feedback-button-container {
    position: fixed;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1000;
}

.feedback-button {
    padding: 20px 7px;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    cursor: pointer;
    writing-mode: vertical-rl;
    text-align: center;
    font-size: 16px;
    color: #333;
}

/* Feedback form sliding from the right */
.feedback-form {
    position: fixed;
    right: -400px; /* Hidden by default */
    top: 0;
    width: 400px;
    height: 100%;
    background-color: white;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
    padding: 20px;
    z-index: 1001;
    transition: right 0.3s ease;
}

.feedback-form.open {
    right: 0;
}

.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close-btn {
    font-size: 24px;
    cursor: pointer;
}

.editable {
    padding: 10px;
    margin: 10px 0;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    min-height: 30px; /* Đảm bảo chiều cao tối thiểu */
}

.editable:focus {
    border-color: #007bff;
    outline: none; /* Loại bỏ viền mặc định khi focus */
}

.form-header {
    display: flex;
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center; /* Căn giữa theo chiều dọc */
    position: relative;
    padding: 10px; /* Tùy chỉnh khoảng cách */
    border-bottom: 1px solid #ddd; /* Tùy chỉnh đường viền dưới */
}

.form-header h3 {
    margin: 0;
    flex-grow: 1; /* Cho phép tiêu đề chiếm không gian còn lại */
    text-align: center; /* Căn giữa tiêu đề */
}

.close-btn {
    position: absolute;
    left: 10px; /* Tùy chỉnh khoảng cách với cạnh trái */
    top: 50%;
    transform: translateY(-50%); /* Căn giữa theo chiều dọc */
    font-size: 20px; /* Tùy chỉnh kích thước nút */
    cursor: pointer;
}
</style>
<script>

    // Hiển thị nút khi scroll xuống dưới một khoảng nhất định
window.onscroll = function() {
    var backToTop = document.getElementById("backToTop");
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTop.style.display = "block";
    } else {
        backToTop.style.display = "none";
    }
};

// Khi nhấn vào nút, cuộn về đầu trang
document.getElementById('backToTop').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Hiệu ứng cuộn mượt
    });
});

  // Get the button, form, and close button
var feedbackButton = document.getElementById("feedbackButton");
var feedbackForm = document.getElementById("feedbackForm");
var closeButton = document.getElementsByClassName("close-btn")[0];

// When the user clicks the button, open the form (slide it in from the right)
feedbackButton.onclick = function() {
    feedbackForm.classList.add("open");
}

// When the user clicks on the close button (X), close the form
closeButton.onclick = function() {
    feedbackForm.classList.remove("open");
}

// When the user clicks outside the form, close the form
window.onclick = function(event) {
    // Check if the click happened outside the form
    if (!feedbackForm.contains(event.target) && event.target !== feedbackButton) {
        feedbackForm.classList.remove("open");
    }
}


</script>
