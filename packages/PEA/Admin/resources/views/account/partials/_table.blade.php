<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="pin-cols min-w-[300px]">Name</th>
                        <th scope="col" class="pin-cols w-[200px]">Status</th>
                        <th scope="col" class="pin-cols w-[200px]">Created Date</th>
                        <th scope="col" class="pin-cols w-[240px]">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse($accounts as $account)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td>
                                <div class="text-base font-semibold text-gray-900 dark:text-white">
                                    {{ object_get($account, 'full_name') }}
                                    @if($account->isAdmin())
                                        <span class="badge ml-1">Supervisor</span>
                                    @endif
                                </div>
                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ object_get($account, 'email') }}</div>
                            </td>
                            <td>{{ object_get($account, 'status_tag') }}</td>
                            <td>{{ $account->created_at->format('d-M-Y') }}</td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin::account.edit', $account->getKey()) }}"
                                        class="btn"><i
                                                 class="fas fa-pencil"></i></a>
                                     <a href="{{ route('admin::account.reset-password', $account->getKey()) }}" class="btn"><i class="fas fa-key"></i></a>
                                     {{ Html::trash('', route('admin::account.delete', $account->getKey()), ['delete_button_class' => 'btn  btn-danger', 'delete_button_icon_class' => 'fal fa-trash-alt']) }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No matching
                                records.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
                    {!! $accounts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

