<div class="help">
  {ts}Here is the QR code for this event. Save it and use for sharing with the audience. When some user will scan this, they will be take to event actions page from where they can take relevant actions (e.g., Contribute material) on the event.{/ts}
</div>

<div class="d-flex flex-column justify-content-center">
  <a id="downloadButton" href="{$qrImageUrl}" download="event_qr_code.png" class="btn btn-primary text-white">
    {ts}Download QR Code{/ts}
  </a>
  <img width="380" height="380" src="{$qrImageUrl}" alt="QR Code for the Event" class="d-block" />
</div>
