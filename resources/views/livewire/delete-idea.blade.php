<x-modal-confirm
                 event-to-open-modal="custom-show-delete-idea-modal"
                 event-to-close-modal="IdeaWasDeleted"
                 modal-title="Delete Idea"
                 modal-description="Are you sure you want to delete Idea ? the because you
                 can't restore it after this action"
                 modal-confirm-button-text="Delete"
                 wire-click="deleteIdea"
 />
