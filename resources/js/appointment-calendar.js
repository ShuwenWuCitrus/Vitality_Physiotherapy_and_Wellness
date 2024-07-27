import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";

document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
            initialView: "timeGridWeek",
            slotDuration: "00:30:00",
            slotMinTime: "09:00:00",
            slotMaxTime: "17:00:00",
            allDaySlot: false,
            weekends: false,
            events: window.availableSlots,
            selectable: true,
            select: function (info) {
                document.getElementById("selected-date").value =
                    info.startStr.split("T")[0];
                document.getElementById("selected-time").value = info.startStr
                    .split("T")[1]
                    .slice(0, 5);
                document.getElementById("appointment-form").style.display =
                    "block";
            },
        });
        calendar.render();
    }
});
