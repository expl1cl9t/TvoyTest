import './bootstrap';

export function displayErrorMessage(text){
    swal.fire({
        title: "Ошибка!",
        text: text,
        imageUrl: "https://u2.9111s.ru/uploads/202301/31/6d441a1314482262897b201565a020d0.jpg",
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: "А что это мы нарушаем"
    });
}
export function displaySuccesRegisterMessage(text, urlToRedirect){
    swal.fire({
        title: "Вы успшено зареистрировались в системе!",
        text: "Хотите сразу перейти на страницу авторизации?",
        imageUrl: "https://mrkot.com/wp-content/uploads/2019/11/koty-prosyat-4.gif",
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: "уря",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Да, хочу перейти"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = urlToRedirect;
        }
    });
}
