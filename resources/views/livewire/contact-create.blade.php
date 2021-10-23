<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="col">
                    <input wire:model="phone" type="number" name="" class="form-control" placeholder="Phone" id="">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </form>
</div>
