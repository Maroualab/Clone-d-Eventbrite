<?php

class Reservation {
    private int $id;
    private string $dateReservation;
    private Participant $participant;
    private Event $event;
    private ?CodePromo $codePromo;
}