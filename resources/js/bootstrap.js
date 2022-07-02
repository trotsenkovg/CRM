import Alpine from 'alpinejs';
import Flatpickr from 'flatpickr';
import Turbolinks from 'turbolinks';

document.addEventListener('turbolinks:load', () => {
    Flatpickr('.datepicker', {
        // mode: 'range',
        // static: true,
        // monthSelectorType: 'static',
        dateFormat: 'd/m/Y',
        // defaultDate: [new Date().setDate(new Date().getDate() - 6), new Date()],
        prevArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
        nextArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
        onReady: (selectedDates, dateStr, instance) => {
            // eslint-disable-next-line no-param-reassign
            instance.element.value = dateStr.replace('to', '-');
            const customClass = instance.element.getAttribute('data-class');
            instance.calendarContainer.classList.add(customClass);
        },
        onChange: (selectedDates, dateStr, instance) => {
            // eslint-disable-next-line no-param-reassign
            instance.element.value = dateStr.replace('to', '-');
        },
    });
});

window.Alpine = Alpine;
Alpine.start();

window.Turbolinks = Turbolinks;
Turbolinks.start();
