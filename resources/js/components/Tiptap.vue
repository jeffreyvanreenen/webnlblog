<template>
    <div class="flex flex-col prose prose-lg">
        <div>
            <div v-if="editor" class="grid grid-cols-4 gap-4">
                <button @click="editor.chain().focus().toggleBold().run()"
                        :class="{ 'is-active': editor.isActive('font-bold') }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    bold
                </button>
                <button @click="editor.chain().focus().toggleItalic().run()"
                        :class="{ 'is-active': editor.isActive('italic') }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    italic
                </button>
                <button @click="editor.chain().focus().toggleStrike().run()"
                        :class="{ 'is-active': editor.isActive('strike') }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    strike
                </button>
                <button @click="editor.chain().focus().setParagraph().run()"
                        :class="{ 'is-active': editor.isActive('paragraph') }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    paragraph
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    h1
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    h2
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    h3
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    h4
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    h5
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    h6
                </button>
                <button @click="editor.chain().focus().toggleBulletList().run()"
                        :class="{ 'is-active': editor.isActive('bulletList') }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    bullet list
                </button>
                <button @click="editor.chain().focus().toggleOrderedList().run()"
                        :class="{ 'is-active': editor.isActive('orderedList') }"
                        class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                    ordered list
                </button>
            </div>
        </div>
        <div class="pt-10">
            <editor-content :editor="editor" class="bg-white rounded-lg border-2 border-orange-500 p-5"/>
        </div>
    </div>


</template>

<script>
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

export default {
    components: {
        EditorContent,
    },

    props: {
        modelValue: {
            type: String,
            default: '',
        },
    },

    data() {
        return {
            editor: null,
        }
    },

    watch: {
        modelValue(value) {
            // HTML
            const isSame = this.editor.getHTML() === value

            // JSON
            // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)

            if (isSame) {
                return
            }

            this.editor.commands.setContent(value, false)
        },
    },

    mounted() {
        this.editor = new Editor({
            extensions: [
                StarterKit,
            ],
            content: this.modelValue,
            onUpdate: () => {
                // HTML
                this.$emit('update:modelValue', this.editor.getHTML())

                // JSON
                // this.$emit('update:modelValue', this.editor.getJSON())
            },
        })
    },

    beforeUnmount() {
        this.editor.destroy()
    },
}
</script>
