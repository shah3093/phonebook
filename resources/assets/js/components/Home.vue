<template>

    <nav class="panel column is-offset-2 is-8">
        <p class="panel-heading">
            Phonebook
            <button class="button is-link is-outlined ">
                Add new
            </button>
        </p>
        <div class="panel-block">
            <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </span>
            </p>
        </div>

        <a class="panel-block is-active">
            <span class="column is-9">bulma</span>

            <span class="panel-icon is-1 column">
                <i class="fas fa-eye has-text-info"></i>
            </span>

            <span class="panel-icon is-1 column">
                <i class="fas fa-edit has-text-primary"></i>
            </span>

            <span class="panel-icon is-1 column">
                <i class="fas fa-trash has-text-danger"></i>
            </span>

        </a>


        <div class="panel-block">

        </div>
    </nav>
</template>
