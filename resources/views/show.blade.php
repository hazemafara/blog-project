@include('includes.navbar')
<section>
   <div>
      <main>
         <section>
            <div>
               <button aria-label="Scroll To Comment">
                  <svg viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                  </svg>
               </button>
               <button aria-label="Scroll To Top">
                  <svg viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                  </svg>
               </button>
            </div>
            <article>
               <div>
                  <header>
                     <div>
                        <dl>
                           <div>
                              <dt>Published on</dt>
                              <dd><time datetime="2023-08-05T00:00:00.000Z">{{ $blog->created_at->format('F j, Y') }}</time></dd>
                           </div>
                        </dl>
                        <div>
                           <h1>{{ $blog->blog_header }}</h1>
                        </div>
                     </div>
                  </header>
                  <div>
                     <dl>
                        <dt>Author</dt>
                        <ul>
                           <dl>
                              <dd>AUTHOR</dd>
                              @if ($blog->author)
                              <dd><a rel="noopener noreferrer" href="/author/{{ $blog->author->id }}">{{ $blog->author->name }}</a></dd>
                              @else
                              <dd><a rel="noopener noreferrer" href="#">author is unknown</a></dd>
                              @endif
                              <dd>CATEGORY</dd>
                              <dd><a rel="noopener noreferrer" href="/category/{{ $blog->category->id }}">{{ $blog->category->name }}</a></dd>
                           </dl>
                        </ul>
                     </dl>
                  </div>
                  <div>
                     <h2><a href="#introduction" aria-hidden="true" tabindex="-1"></a>Introduction</h2>
                     <p>{{ $blog->blog_tekst }}</p>
                     <form method="POST" action="{{ route('comment.store') }}">
                        @csrf
                        <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                        <input type="hidden" id="user_name" name="user_name" value="{{ Auth::user()->name }}">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="text" id="comment" name="comment" placeholder="Your comment">
                        <input type="submit" value="Submit Comment">
                     </form>
                     @foreach ($comments as $comment)
                     <?php $createdAt = $comment->created_at; ?>
                     <div>
                        <div>
                           <div>
                              <div>
                                 <h5>{{ $comment->user_name }}</h5>
                                 <span>{{ $comment->timeAgo }}</span>
                              </div>
                              <p>{{ $comment->comment }}</p>
                              @if (auth()->user()->id === $comment->user_id)
                              <div>
                                 <form method="POST" action="{{ route('comment.delete', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                 </form>
                                 <button class="edit-comment-button" data-comment-id="{{ $comment->id }}">Edit</button>
                              </div>
                              <form method="POST" action="{{ route('comment.update', $comment->id) }}" style="display: none;">
                                 @csrf
                                 @method('PUT')
                                 <textarea name="comment">{{ $comment->comment }}</textarea>
                                 <button type="submit">Save</button>
                              </form>
                              @endif
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <script>
                     document.addEventListener("DOMContentLoaded", function() {
                         var editButtons = document.querySelectorAll('.edit-comment-button');
                     
                         editButtons.forEach(function(button) {
                             button.addEventListener('click', function() {
                                 var parentComment = this.parentElement.parentElement.parentElement;
                                 var editForm = parentComment.querySelector('form[style]');
                     
                                 var allEditForms = document.querySelectorAll('form[style]');
                                 allEditForms.forEach(function(form) {
                                     form.style.display = 'none';
                                 });
                     
                                 if (editForm) {
                                     editForm.style.display = 'block';
                                 }
                             });
                         });
                     });
                  </script>
               </div>
            </article>
         </section>
      </main>
   </div>
</section>