<x-layout>
    <div id="page-settings" class="content" style="display:none;">
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:1px;margin-bottom:24px;">
            Settings</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Gym Details</h2>
                    <div class="mb-3"><label class="form-label">Gym Name</label><input type="text"
                            class="form-control" value="Pump House"></div>
                    <div class="mb-3"><label class="form-label">Email</label><input type="email"
                            class="form-control" value="admin@pumphouse.gym"></div>
                    <div class="mb-3"><label class="form-label">Phone</label><input type="text"
                            class="form-control" value="+92 300 0000000"></div>
                    <div class="mb-3"><label class="form-label">Address</label><input type="text"
                            class="form-control" value="123 Fitness Ave, Rawalpindi"></div>
                    <button class="btn-accent">Save Changes</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-card">
                    <h2
                        style="font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:1px;margin-bottom:20px;">
                        Opening Hours</h2>
                    <div class="mb-3"><label class="form-label">Weekdays</label>
                        <div class="row g-2">
                            <div class="col"><input type="time" class="form-control" value="05:00">
                            </div>
                            <div class="col"><input type="time" class="form-control" value="22:00">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"><label class="form-label">Saturday</label>
                        <div class="row g-2">
                            <div class="col"><input type="time" class="form-control" value="07:00">
                            </div>
                            <div class="col"><input type="time" class="form-control" value="20:00">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"><label class="form-label">Sunday</label>
                        <div class="row g-2">
                            <div class="col"><input type="time" class="form-control" value="08:00">
                            </div>
                            <div class="col"><input type="time" class="form-control" value="18:00">
                            </div>
                        </div>
                    </div>
                    <button class="btn-accent">Save Hours</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
